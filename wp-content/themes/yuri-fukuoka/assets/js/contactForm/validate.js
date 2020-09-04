const emailRegexp = new RegExp(
  /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/
)

export default class Validate {
  static validate(values = {}, config) {
    console.log(values, config)
    const result = {}
    return Object.keys(values)
      .map(key => {
        const value = values[key]
        console.log(key, values[key])
        const rules = config.find(item => item.name === key).rules
        if (!rules) return

        return Object.keys(rules)
          .map(ruleName => {
            return validators[ruleName](value)
              ? { name: key, type: ruleName }
              : null
          })
          .reduce((a, c) => a || c, null)
      })
      .filter(v => v)
    return [{ name: 'email', type: 'required' }]
    return result
  }

  static getErrorMessage(type, label) {
    switch (type) {
      case 'required':
        return label ? `${label}を入力してください。` : '入力してください。'

      case 'format':
        return label
          ? `${label}の形式が正しくありません。`
          : '形式が正しくありません。'
    }
    return
  }
}

const validators = {
  required: value => !value,
  format: value => !emailRegexp.test(value)
}
