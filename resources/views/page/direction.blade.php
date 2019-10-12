@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div id="app">
        <description
            title="趋向补语"
            sub-title="Complement of direction"
            pinyin="状态的在谓语动词后面补充说明动作趋向的词和词组，叫趋向补语。持续或动作的进行"
            en-desc="After the predicate verb, the words and phrases that indicate the trend of the action are added, which is called the complement of direction."
            :pattern="{{ json_encode($pattern) }}"
            theme="direction"
        ></description>
    </div>
@endsection