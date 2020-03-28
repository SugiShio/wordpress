export const hexNumRefToString = hexNumRef => {
  return hexNumRef.replace(/&#x([0-9a-f]+);/gi, (match, $1) => {
    return String.fromCharCode('0x' + $1)
  })
}

export const decNumRefToString = decNumRef => {
  return decNumRef.replace(/&#(\d+);/gi, (match, $1) => {
    return String.fromCharCode($1)
  })
}
