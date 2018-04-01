import _ from 'lodash'
import {i18nModules} from './../modules.js'

import en from './en'
import fr from './fr'

let messages = {
  en,
  fr
}

_.forEach(messages, function (item, key) {
  Object.assign(item, i18nModules[key])
})

export default messages
