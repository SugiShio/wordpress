const ExtractTextPlugin = require('extract-text-webpack-plugin')
const VueLoaderPlugin = require('vue-loader/lib/plugin')
const WebpackNotifierPlugin = require('webpack-notifier')
const path = require('path')
const glob = require('glob')

// entryを自動生成
setEntries = options => {
  const namespace = options.theme || options.plugin
  const targetPath = namespace
    ? './wp-content/**/' + namespace + '/**/app*.js'
    : './wp-content/**/app*.js'
  return glob.sync(targetPath).map(file => {
    const entry = file.replace(/wp-content\/.*?\//, '')
    const type = file.match(/wp-content\/(.*?)\//, '')[1]
    const path = entry.split('/')
    const projectName = path[1]
    const filename = path[path.length - 1]
    const suffix = filename.replace(/^app/, '').replace(/\.js$/, '')
    return { entry, type, projectName, suffix }
  })
}

module.exports = (env = {}) => {
  const entries = setEntries(env)
  return entries.map(({ entry, type, projectName, suffix }) => {
    const mode = env.NODE_ENV || 'development'
    const useSourceMap = false
    return {
      mode,
      context: path.join(__dirname, `wp-content/${type}`),
      entry,
      output: {
        path: path.join(__dirname, `wp-content/${type}`),
        filename: `${projectName}/public/js/index${suffix}.js`
      },
      module: {
        rules: [
          {
            test: /\.scss$/,
            use: ExtractTextPlugin.extract({
              use: [
                {
                  loader: 'css-loader',
                  options: { sourceMap: useSourceMap, importLoaders: 2 }
                },
                {
                  loader: 'postcss-loader',
                  options: {
                    sourceMap: useSourceMap,
                    plugins: [require('autoprefixer')({ grid: true })]
                  }
                },
                {
                  loader: 'sass-loader',
                  options: { sourceMap: useSourceMap }
                }
              ]
            })
          },
          {
            test: /\.(png|jpg|jpeg|gif|svg|eot|ttf|woff|woff2)$/i,
            use: [
              {
                loader: 'url-loader',
                options: {
                  name: '[path][name].[ext]',
                  outputPath: '',
                  publicPath: '../'
                  // limit: 1048576,
                }
              }
            ]
          },
          {
            test: /\.js$/,
            use: [
              {
                loader: 'babel-loader',
                options: {
                  presets: [
                    ['@babel/preset-env', { targets: { node: 'current' } }]
                  ]
                }
              }
            ]
          },
          {
            test: /\.vue$/,
            use: [
              {
                loader: 'vue-loader'
              }
            ]
          },
          {
            test: /\.pug$/,
            oneOf: [
              {
                resourceQuery: /^\?vue/,
                use: ['pug-plain-loader']
              },
              {
                use: ['raw-loader', 'pug-plain-loader']
              }
            ]
          }
        ]
      },
      plugins: [
        new ExtractTextPlugin(`${projectName}/public/css/style${suffix}.css`),
        new VueLoaderPlugin(),
        new WebpackNotifierPlugin()
      ],
      resolve: {
        alias: {
          vue$: 'vue/dist/vue.common.js'
        }
      }
    }
  })
}
