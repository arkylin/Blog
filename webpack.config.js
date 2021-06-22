const path=require('path');

module.exports={
    mode: 'development',
	//JavaScript执行入口文件,
	entry:'./resources/assets/sass/app.scss',
	//需要指定一下输出的路径path和输出的文件名filename
	output:{
		filename:'bundle.js',   //自定义输出文件名
		path:path.resolve(__dirname,'./public/assets/')  //自定义输出文件所在目录
	},
    // loader的配置
    module: {
        rules: [
            // 详细loader配置
            // 不同文件必须配置不同loader处理
            {
                // 匹配哪些文件
                test: /\.css$/,
                // 使用哪些loader进行处理
                use: [
                // use数组中loader执行顺序：从右到左，从下到上 依次执行
                // 创建style标签，将js中的样式资源插入进行，添加到head中生效
                'style-loader',
                // 将css文件变成commonjs模块加载js中，里面内容是样式字符串
                'css-loader'
                ]
            },
            {
                test: /\.less$/,
                use: [
                'style-loader',
                'css-loader',
                // 将less文件编译成css文件
                // 需要下载 less-loader和less
                'less-loader'
                ]
            },
            // { test: /\.css$/, use: ["style-loader", "css-loader"] }, // 从右到左 参数1打包到html文件，参数2打包到js文件
        // 先打包 less-loader 打包成css，然后再通过css-loader 打包到js文件中，再通过style-loader 以头标签的形式 插入到html中
            { test: /\.scss$/, use: ["style-loader", "css-loader", "sass-loader"] },
            {
                test: /\.(ttf|eot|svg|gif|woff|woff2)(\?v=[0-9]\.[0-9]\.[0-9])?$/,
                use: [{
                    loader: 'file-loader',
                }]
            },
        ]
    },
}