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
                <textarea name="" id="" cols="30" rows="5" placeholder="Sentence" class="f-1"></textarea>
                <div class="f-1">
                    <div class="p-20 btn-checker">Check</div>
                </div>
                <textarea name="" id="" cols="30" rows="5" placeholder="Result" class="f-1"></textarea>
            </div>
        </div>
    </div>
</template>

<script>
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
      message: "parent"
    };
  }
};
</script>

<style scoped>
.container {
  width: 980px;
  margin: auto;
  margin-top: 60px;
}
</style>