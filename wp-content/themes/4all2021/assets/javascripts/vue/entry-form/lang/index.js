import ja from './ja.js'
import en from './en.js'
const langSet = { ja, en }
export default (key, lang) => {
  return langSet[lang][key] !== undefined ? langSet[lang][key] : key
}
