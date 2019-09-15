<template>
    <div class="container">
        <p class="title">
            {{ title }}
        </p>
        <p class="sub-title m-b-20">
            {{ subTitle }}
        </p>
        <p class="description m-l-20 m-b-20">
            时量补语是用来表达动作或状态持续时间的。时量补语表示动作行为或状态在一段时间内的持续，但主要是对动作行为或状态进行正常描述。
        </p>
        <p class="description m-l-20 m-b-20">
            Complement of duration is used to express the duration of an action or state. Time-qualifiers indicate the duration of an action or state over a period of time, but are primarily a description of the action or state.
        </p>

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
            default: ''
        },
        subTitle: {
            type: String,
            default: ''
        }
    },
    data() {
      return {
        message: 'parent'
      }
    }
  };
</script>

<style scoped>
.container {
    width: 980px;
    margin:auto;
    margin-top: 60px;
}
</style>