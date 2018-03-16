import _ from 'lodash'

let Modules = [
  {name: 'Simple', enabled: true, folder: 'Simple', layout: 'default'},
  {name: 'NewsLetter', enabled: true, folder: 'NewsLetter', layout: 'default'},
  {name: 'Test', enabled: true, folder: 'Test', layout: 'default'}
]

let routesModules = []
_.forEach(Modules, function (module) {
  let file = './Modules/' + module.folder + '/vueapp/router/routes.js'
  let x = require(`${file}`)

  if (!module.layout) {
    module.layout = 'default'
  }

  if (!routesModules[module.layout]) {
    routesModules[module.layout] = []
  }
  routesModules[module.layout].push(x.default)
})

let i18nModules = []
_.forEach(Modules, function (module) {
  let file = './Modules/' + module.folder + '/vueapp/i18n/index.js'
  let x = require(`${file}`)
  _.forEach(x.default, function (item, lang) {
    if (!i18nModules[lang]) {
      i18nModules[lang] = []
    }
    i18nModules[lang][module.name.toLowerCase()] = item
  })
})
console.log(i18nModules)

let storeModules = []
_.forEach(Modules, function (module) {
  let file = './Modules/' + module.folder + '/vueapp/store/index.js'
  let x = require(`${file}`)
  storeModules[module.name.toLowerCase()] = x.default
})

export {
  routesModules,
  i18nModules,
  storeModules
}
