export const STRIPE_STYLE = {
  base: {
    fontSize: '14px',
    color: '#000'
  },
  invalid: {
    color: '#000'
  }
}
export const DEPARTMENTS = ['instrument', 'song', '4all', 'photo']

const formItems = {
  entryName: {
    key: 'entryName',
    name: 'entry-name',
    type: 'text',
    placeholder: 'entryNamePlaceholder',
    description: 'entryNameDescription',
    validate: {
      require: { value: 1, message: 'required' }
    }
  },
  fullName: {
    key: 'fullName',
    name: 'full-name',
    type: 'text',
    placeholder: 'fullNamePlaceholder',
    description: 'fullNameDescription',
    validate: {
      require: { value: 1, message: 'required' }
    }
  },
  email: {
    name: 'email',
    key: 'email',
    type: 'email',
    placeholder: 'emailPlaceholder',
    description: 'emailDescription',
    validate: {
      require: { value: 1, message: 'required' },
      regex: {
        value:
          '^[A-Za-z0-9]{1}[A-Za-z0-9_.-]*@{1}[A-Za-z0-9_.-]{1,}.[A-Za-z0-9]{1,}$',
        message: 'emailInvalid'
      },
      twice: {
        value: true,
        message: 'emailNotMatch'
      }
    }
  },
  phone: {
    name: 'phone',
    key: 'phone',
    type: 'text',
    placeholder: 'phonePlaceholder',
    description: 'phoneDescription',
    validate: {
      require: { value: 1, message: 'required' }
      // regex: {
      //   value: '[0-9]{10,11}',
      //   message: 'phoneInvalid'
      // }
    }
  },
  address: {
    key: 'address',
    name: 'address',
    type: 'address',
    placeholder: 'addressPlaceholder',
    validate: {
      require: { value: 1, message: 'required' }
    }
  },
  song: {
    key: 'songForm',
    name: 'song',
    type: 'song',
    validate: {
      require: { value: 1, message: 'required' }
    }
  },
  workTitle: {
    key: 'workTitle',
    name: 'work-title',
    type: 'text',
    placeholder: 'workTitlePlaceholder',
    validate: {
      require: { value: 1, message: 'required' }
    }
  },
  profile: {
    key: 'profile',
    name: 'profile',
    type: 'textarea',
    placeholder: 'profilePlaceholder',
    validate: {
      require: { value: 1, message: 'required' }
    }
  },
  members_2: {
    key: 'member',
    name: 'member',
    type: 'members',
    max: 2,
    addLabel: 'memberAddLabel',
    validate: {
      require: { value: 1, message: 'required' }
    }
  },
  members_8: {
    key: 'member',
    name: 'member',
    type: 'members',
    max: 8,
    addLabel: 'memberAddLabel',
    validate: {
      require: { value: 1, message: 'required' }
    }
  },
  image: {
    key: 'image',
    name: 'image',
    type: 'file',
    description: 'imageDescription',
    validate: {
      require: { value: 1, message: 'required' }
    }
  },
  youtubeUrl: {
    key: 'url',
    name: 'url',
    type: 'text',
    placeholder: 'moviePlaceholder',
    description: 'urlDescription',
    validate: {
      require: { value: 1, message: 'required' },
      regex: {
        value: '^https://.*youtu.?be',
        message: 'movieInvalid'
      }
    }
  },
  photoUrl: {
    key: 'url',
    name: 'url',
    type: 'text',
    max: 4,
    placeholder: 'photoPlaceholder',
    addLabel: 'photoAddLabel',
    validate: {
      require: { value: 1, message: 'required' },
      regex: {
        value: '^https://.*(instagram|twitter|facebook)',
        message: 'photoInvalid'
      }
    }
  }
}

export const FORM_CONFIG = {
  instrument: {
    items: [
      formItems.entryName,
      formItems.fullName,
      formItems.email,
      formItems.phone,
      formItems.address,
      formItems.song,
      formItems.profile,
      // formItems.members_2,
      formItems.image,
      formItems.youtubeUrl
    ],
    fee: 2000
  },
  song: {
    items: [
      formItems.entryName,
      formItems.fullName,
      formItems.email,
      formItems.phone,
      formItems.address,
      formItems.song,
      formItems.profile,
      // formItems.members_2,
      formItems.image,
      formItems.youtubeUrl
    ],
    fee: 2000
  },
  '4all': {
    items: [
      formItems.entryName,
      formItems.fullName,
      formItems.email,
      formItems.phone,
      formItems.address,
      formItems.workTitle,
      formItems.profile,
      formItems.members_8,
      formItems.image,
      formItems.youtubeUrl
    ],
    fee: 3000
  },
  photo: {
    items: [
      formItems.entryName,
      formItems.fullName,
      formItems.email,
      formItems.phone,
      formItems.address,
      formItems.workTitle,
      formItems.profile,
      formItems.members_8,
      formItems.image,
      formItems.photoUrl
    ],
    fee: 0
  }
}

import PaymentForm from '../components/paymentForm.vue'
import UkuleleAddress from '../components/address.vue'
import UkuleleEmail from '../components/email.vue'
import UkuleleFile from '../components/file.vue'
import UkuleleMembers from '../components/members.vue'
import UkuleleSong from '../components/song.vue'
import UkuleleText from '../components/text.vue'
import UkuleleTextarea from '../components/textarea.vue'
export const COMPONENTS = {
  PaymentForm,
  UkuleleAddress,
  UkuleleEmail,
  UkuleleFile,
  UkuleleMembers,
  UkuleleSong,
  UkuleleText,
  UkuleleTextarea
}

export const SONG_TYPES = ['original', 'existing']

export const CARD_FORM_ITEMS = ['cardNumber', 'cardExp', 'cvc', 'amount']
