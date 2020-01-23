const ExtractTextPlugin = require('extract-text-webpack-plugin')
const VueLoaderPlugin = require('vue-loader/lib/plugin')
const WebpackNotifierPlugin = require('webpack-notifier')
const path = require('path')
const glob = require('glob')

// entryを自動生成
// entries = (env = {}) => {
//   const TARGETS = env.theme ? './**/' + env.theme + '/**/app.js' : './**/app.js'
//   let entries = {}
//   glob.sync(TARGETS).map(function(file) {
//     const FILE_PATH = file.replace(/wp-content\/themes\//, '')
//     const PROJECT_NAME = FILE_PATH.split('/')[1]
//     entries[PROJECT_NAME] = FILE_PATH
//   })
//   return entries
// }

const entries = glob.sync('./wp-content/**/app*.js').map(file => {
  const entry = file.replace(/wp-content\/themes\//, '')
  const path = entry.split('/')
  const projectName = path[1]
  const filename = path[path.length - 1]
  const suffix = filename.replace(/^app/, '').replace(/\.js$/, '')
  return { entry, projectName, suffix }
})

module.exports = (env = {}) => {
  return entries.map(({ entry, projectName, suffix }) => {
    const mode = env.NODE_ENV || 'development'
    const useSourceMap = false
    return {
      mode,
      context: path.join(__dirname, 'wp-content/themes'),
      entry,
      output: {
        path: path.join(__dirname, 'wp-content/themes'),
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
