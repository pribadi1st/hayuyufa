<template>
    <div class="container">
        <p class="title">
            {{ title }}
        </p>
        <p class="sub-title m-b-20">
            {{ subTitle }}
        </p>
        <p class="description m-l-20 m-b-20">
            {{ pinyin }}
        </p>
        <p class="description m-l-20 m-b-20">
            {{ enDesc }}
        </p>

        <ul class="example">
          <li v-for="i in pattern" :key="i.key">
            <p class="example-section">{{ i.key }}</p>
            <ul class="sub-example">
              <li v-for="j in i.example" :key="j">
                <p class="example-text">{{ j }}</p>
              </li>
            </ul>
          </li>
        </ul>

        <div class="checker p-20">
            <p class="header-text m-b-15">Check your grammar</p>
            <div class="form-checker">
                <textarea v-model="sourceInput" id="" cols="30" rows="5" placeholder="Sentence" class="f-1"></textarea>
                <div class="f-1">
                    <div
                      class="p-h-20 p-v-5 btn-checker is-loading" 
                      @click="checkGrammar"
                      v-if="!isChecking"
                    >
                      <p class="is-marginless" >
                        Check
                      </p>
                    </div>
                    <div class="spinner" v-else>
                      <div class="bounce1"></div>
                      <div class="bounce2"></div>
                      <div class="bounce3"></div>
                    </div>
                </div>
                <textarea :class="result" v-model="sourceOuput" id="" cols="30" rows="5" class="f-1" readonly></textarea>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios'
export default {
  props: {
    title: {
      type: String,
      default: ""
    },
    subTitle: {
      type: String,
      default: ""
    },
    pinyin: {
      type: String,
      default: ""
    },
    enDesc: {
      type: String,
      default: ""
    },
    theme: {
      type: String,
      default: ''
    },
    pattern: {
      type: Array,
      default: () => [
        {
          key: "V + 时量补语",
          example: [
            "咱们休息十分钟。",
            "A：你昨天预习了多长时间？",
            "B：预习了半个多小时。",
            "我打算在中国学四年。"
          ]
        }
      ]
    }
  },
  data() {
    return {
      message: "parent",
      sourceInput: '',
      sourceOuput: '',
      resultOutput: [],
      isChecking: false
    };
  },
  computed: {
    result: function(){
      if(this.resultOutput.length > 0) {
        if(this.resultOutput.every( flag => flag == 1)) 
          return 'has-background-success'
        else
          return 'has-background-failed'
      }
      return ''
    }
  },
  methods: {
    checkGrammar: async function(){
      if(!this.sourceInput) {
        alert('please input something')
        return 
      }
      this.isChecking = true
      const { data: { result }} = await axios.post('/api/predict',{
        'grammar': this.sourceInput,
	      'section': this.theme
      })
      this.resultOutput = [...result.flag]
      this.sourceOuput = result.values.join(' ')
      this.isChecking = false
    }
  },
};
</script>

<style scoped>
.container {
  width: 980px;
  margin: auto;
  // margin-top: 60px;
}

.spinner {
  margin: auto;
  width: 70px;
  text-align: center;
}

.spinner > div {
  width: 18px;
  height: 18px;
  background-color: #333;

  border-radius: 100%;
  display: inline-block;
  -webkit-animation: sk-bouncedelay 1.4s infinite ease-in-out both;
  animation: sk-bouncedelay 1.4s infinite ease-in-out both;
}

.spinner .bounce1 {
  -webkit-animation-delay: -0.32s;
  animation-delay: -0.32s;
}

.spinner .bounce2 {
  -webkit-animation-delay: -0.16s;
  animation-delay: -0.16s;
}

@-webkit-keyframes sk-bouncedelay {
  0%, 80%, 100% { -webkit-transform: scale(0) }
  40% { -webkit-transform: scale(1.0) }
}

@keyframes sk-bouncedelay {
  0%, 80%, 100% { 
    -webkit-transform: scale(0);
    transform: scale(0);
  } 40% { 
    -webkit-transform: scale(1.0);
    transform: scale(1.0);
  }
}
</style>