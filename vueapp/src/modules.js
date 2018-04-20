import _ from 'lodash'

const moduleFolder = 'Modules'
/*
*Modules list
*/
const Modules = require('./../modules')

/*
* import routes modules
*/
let routesModules = []
_.forEach(Modules, function (module) {
  if (module.enabled) {
    let filePath = './' + moduleFolder + '/' + module.folder + '/router/routes.js'
    let obj = require(`${filePath}`)
    if (!module.layout) {
      module.layout = 'default'
    }
    if (!routesModules[module.layout]) {
      routesModules[module.layout] = []
    }
    routesModules[module.layout].push(obj.default)
  }
})

/*
* import i18n modules
*/
let i18nModules = []
_.forEach(Modules, function (module) {
  if (module.enabled) {
    let filePath = './' + moduleFolder + '/' + module.folder + '/i18n/index.js'
    let obj = require(`${filePath}`)
    _.forEach(obj.default, function (item, lang) {
      if (!i18nModules[lang]) {
        i18nModules[lang] = []
      }
      i18nModules[lang][module.name.toLowerCase()] = item
    })
  }
})

/*
* import store modules
*/
let storeModules = []
_.forEach(Modules, function (module) {
  if (module.enabled) {
    let filePath = './' + moduleFolder + '/' + module.folder + '/store/index.js'
    let obj = require(`${filePath}`)
    storeModules[module.name.toLowerCase()] = obj.default
  }
})

export {
  routesModules,
  i18nModules,
  storeModules
}
