const path = require('path')

function resolve (dir) {
  return path.join(__dirname, 'src', dir)
}

// Configuration for your app
module.exports = function (ctx) {
  return {
    // app plugins (/src/plugins)
    plugins: [
      'i18n',
      'axios',
      'apollo',
      'vuelidate'
    ],
    css: [
      'app.styl'
    ],
    extras: [
      ctx.theme.mat ? 'roboto-font' : null,
      'material-icons'
      // 'ionicons',
      // 'mdi',
      // 'fontawesome'
    ],
    supportIE: true,
    vendor: {
      add: [],
      remove: []
    },
    build: {
      env: ctx.dev ? {
        GRAPHQL_URL: JSON.stringify('http://fundev.xx/graphql'),
        GRAPHQL_AUTH_URL: JSON.stringify('http://fundev.xx/graphql/auth'),
        API_URL: JSON.stringify('http://fundev.xx/api')
      } : { // and on build (production):
        GRAPHQL_URL: JSON.stringify('http://fundev.xx/graphql'),
        GRAPHQL_AUTH_URL: JSON.stringify('http://fundev.xx/graphql/auth'),
        API_URL: JSON.stringify('http://fundev.xx/api')
      },
      scopeHoisting: true,
      vueRouterMode: 'history',
      productName: 'Laravel VueJs Modules',
      // gzip: true,
      // analyze: true,
      // extractCSS: false,
      // useNotifier: false,
      publicPath: '/',
      htmlFilename: './../resources/views/index.blade.php',
      distDir: './../public/',
      extendWebpack (cfg) {
        /* cfg.module.rules.push({
          test: /\.json$/,
          loader: 'json-loader'
        }) */
        /* cfg.module.rules.push({
          enforce: 'pre',
          test: /\.(vue)$/,
          loader: 'babel-loader',
          exclude: /(node_modules|quasar)/,
          options: {
            presets: [
              ['env', {'modules': false}],
              'stage-2'
            ],
            plugins: ['transform-runtime', 'syntax-dynamic-import', 'transform-object-rest-spread']
            // plugins: [require('babel-plugin-transform-object-rest-spread')]
          }
        }) */
        /* cfg.resolve.symlinks = true
        cfg.resolve.alias.vue = 'vue/dist/vue.js'
        cfg.resolve.alias['@'] = resolve('src')
        cfg.resolve.alias['Modules'] = resolve('Modules')
        cfg.resolve.alias['config'] = resolve('config') */
        cfg.resolve.alias = {
          ...cfg.resolve.alias, // This adds the existing alias
          // Add you own alias like this
          modules: path.resolve(__dirname, './src/Modules'),
          '@': resolve('src')
        }
        // console.log(cfg.resolve.alias)
        /* cfg.module.rules.push({
          test: /\.(js|vue)$/,
          loader: 'eslint-loader',
          enforce: 'pre',
          include: [resolve('src'), resolve('test')],
          options: {
            formatter: require('eslint-friendly-formatter')
          }
        }) */
        cfg.module.rules.push({
          test: /\.(php)$/,
          loader: 'ignore-loader'
        })
        /* cfg.module.rules.push({
          test: /\.(html)$/,
          loader: 'html-loader'
        }) */
        // cfg.context = path.resolve(__dirname, './src')
        // cfg.resolve.alias['@'] = path.resolve(__dirname, './src')
        // cfg.resolve.modules.push(path.resolve(__dirname, './Modules'))
        // console.log(cfg.plugins)
      }
    },
    devServer: {
      // https: true,
      // port: 8080,
      open: false, // opens browser window automatically
      proxy: {
        // proxy all requests starting with /api to jsonplaceholder
        '/api': {
          // target: process.env.API_PROXY_URL,
          target: 'http://fundev.xx',
          changeOrigin: true,
          pathRewrite: {
            //   '^/api': '/api'
          }
        }
      }
    },
    // framework: 'all' --- includes everything; for dev only!
    framework: {
      components: [
        'QLayout',
        'QLayoutHeader',
        'QLayoutDrawer',
        'QPageContainer',
        'QPage',
        'QToolbar',
        'QToolbarTitle',
        'QBtn',
        'QIcon',
        'QList',
        'QListHeader',
        'QItem',
        'QItemMain',
        'QItemSide',
        'QInput',
        'QCheckbox',
        'QSpinner',
        'QSpinnerMat',
        'QInnerLoading',
        'QCard',
        'QCardTitle',
        'QCardMain',
        'QCardMedia',
        'QCardSeparator',
        'QCardActions'
      ],
      directives: [
        'Ripple'
      ],
      // Quasar plugins
      plugins: [
        'Notify'
      ]
    },
    // animations: 'all' --- includes all animations
    animations: [
      'bounceInLeft',
      'bounceOutRight'
    ],
    pwa: {
      cacheExt: 'js,html,css,ttf,eot,otf,woff,woff2,json,svg,gif,jpg,jpeg,png,wav,ogg,webm,flac,aac,mp4,mp3',
      manifest: {
        name: 'Quasar App',
        short_name: 'Quasar-PWA',
        description: 'Best PWA App in town!',
        display: 'standalone',
        orientation: 'portrait',
        background_color: '#ffffff',
        theme_color: '#027be3',
        icons: [
          {
            'src': 'statics/icons/icon-128x128.png',
            'sizes': '128x128',
            'type': 'image/png'
          },
          {
            'src': 'statics/icons/icon-192x192.png',
            'sizes': '192x192',
            'type': 'image/png'
          },
          {
            'src': 'statics/icons/icon-256x256.png',
            'sizes': '256x256',
            'type': 'image/png'
          },
          {
            'src': 'statics/icons/icon-384x384.png',
            'sizes': '384x384',
            'type': 'image/png'
          },
          {
            'src': 'statics/icons/icon-512x512.png',
            'sizes': '512x512',
            'type': 'image/png'
          }
        ]
      }
    },
    cordova: {
      // id: 'org.cordova.quasar.app'
    },
    electron: {
      extendWebpack (cfg) {
        // do something with cfg
      },
      packager: {
        // OS X / Mac App Store
        // appBundleId: '',
        // appCategoryType: '',
        // osxSign: '',
        // protocol: 'myapp://path',
        // Window only
        // win32metadata: { ... }
      }
    },
    // leave this here for Quasar CLI
    starterKit: '1.0.0'
  }
}
