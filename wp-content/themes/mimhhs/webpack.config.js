var path = require('path'),
    ExtractTextPlugin = require('extract-text-webpack-plugin');

module.exports = [
{
    context: path.join(__dirname, 'assets/js'),
    entry: {
        script: './script.js'
    },
    output: {
        path: path.join(__dirname, 'public/js'),
        filename: '[name].js'
    }
},
{
    context: path.join(__dirname, 'assets/sass'),
    entry: {
        style: './style.scss'
    },
    output: {
        path: path.join(__dirname, 'public/css'),
        filename: '[name].css'
    },
    module: {
        loaders: [
            {
                test: /\.scss$/,
                loader: ExtractTextPlugin.extract('css-loader?-url&minimize&sourceMap!sass-loader')
            }
        ]
    },
    devtool: 'source-map',
    plugins: [
        new ExtractTextPlugin('[name].css')
    ]
}
];