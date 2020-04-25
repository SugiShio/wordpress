export default class Fellow {
  constructor(params) {
    this.name = params.title.rendered
    this.title = params.subtitle
    this.content = params.content.rendered
    const snsMedia = ['instagram', 'twitter', 'facebook', 'web']
    this.sns = []
    snsMedia.forEach(media => {
      if (params[media]) {
        this.sns.push({
          media,
          body: params[media]
        })
      }
    })
  }
}
