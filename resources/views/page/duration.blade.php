@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div id="app">
        <description
            title="​时量补语"
            sub-title="Complement of duration"
            pinyin="时量补语是用来表达动作或状态持续时间的。时量补语表示动作行为或状态在一段时间内的持续，但主要是对动作行为或状态进行正常描述。"
            en-desc="Complement of duration is used to express the duration of an action or state. Time-qualifiers indicate the duration of an action or state over a period of time, but are primarily a description of the action or state."
            :pattern="{{json_encode($pattern)}}"
            theme="duration"
        ></description>
    </div>
@endsection

<script>
    let pattern = "Complement of duration is used to express the duration of an action or state. Time-qualifiers indicate the duration of an action or state over a period of time, but are primarily a description of the action or state."
</script>