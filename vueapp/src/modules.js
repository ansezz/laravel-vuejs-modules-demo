import _ from 'lodash'

const moduleFolder = 'Modules'
const vueAppFolder = 'vueapp'
const Modules = [
  {name: 'Simple', enabled: true, folder: 'Simple', layout: 'default'},
  {name: 'NewsLetter', enabled: true, folder: 'NewsLetter', layout: 'default'},
  {name: 'Test', enabled: true, folder: 'Test', layout: 'default'}
]

let routesModules = []
_.forEach(Modules, function (module) {
  if (module.enabled) {
    let filePath = './' + moduleFolder + '/' + module.folder + '/' + vueAppFolder + '/router/routes.js'
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

let i18nModules = []
_.forEach(Modules, function (module) {
  if (module.enabled) {
    let filePath = './' + moduleFolder + '/' + module.folder + '/' + vueAppFolder + '/i18n/index.js'
    let obj = require(`${filePath}`)
    _.forEach(obj.default, function (item, lang) {
      if (!i18nModules[lang]) {
        i18nModules[lang] = []
      }
      i18nModules[lang][module.name.toLowerCase()] = item
    })
  }
})

let storeModules = []
_.forEach(Modules, function (module) {
  if (module.enabled) {
    let filePath = './' + moduleFolder + '/' + module.folder + '/' + vueAppFolder + '/store/index.js'
    let obj = require(`${filePath}`)
    storeModules[module.name.toLowerCase()] = obj.default
  }
})

export {
  routesModules,
  i18nModules,
  storeModules
}
