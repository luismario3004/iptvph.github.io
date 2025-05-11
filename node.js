const webpack = require('webpack');
const path = require('path');

const config = {
    entry: './src/index.php', // Your entry point
    output: {
        path: path.resolve(__dirname, 'dist'),
        filename: 'bundle.js' // Output bundled file
    },
    mode: 'production', // Set build mode to production
};

webpack(config, (err, stats) => {
    if (err) {
        console.error('Webpack error:', err);
        process.exit(1);
    }

    console.log(stats.toString({
        chunks: false,  // Display only essential information
        colors: true,   // Color output in terminal
    }));
    console.log('Build successful.');
});
