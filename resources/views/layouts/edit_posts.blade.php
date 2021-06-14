<div id="post_header">
<h1><input type="text" id="post_title" v-model="post_title" :style="{width:get_width(post_title)}"></h1>
<input type="text" id="post_slug" v-model="post_slug" :style="{width:get_width(post_slug)}"><br />
</div>
<script>
Vue.createApp({
    data() {
        return {
            post_title: '',
            post_slug: ''
        }
    },
    methods: {
        get_width(text) {
            if (text != "") {
                return text.length * 1.088 + "em"
            }
        }
    }
}).mount('#post_header')
</script>
<hr class="dropdown-divider">
@include('layouts._vditor', ['ifnew' => 'y'])
</br>

<div class="d-grid gap-2 d-md-flex justify-content-md-end">
<!-- <form action="edit" method="POST"> -->
<!-- <input class="btn btn-primary" type="submit" name="submit" value="1" onclick="myFunction()"> -->
<button class="btn btn-primary" onclick="myFunction()">提交</button>
<!-- </form> -->
</div>
</br>

<script>
function myFunction() {
    let PostValue = this.vditor.getValue();
    let NowTime = Math.round((new Date()) / 1000);
    let PostData = {
        title: $("#post_title").val(),
        slug: $("#post_slug").val(),
        created: NowTime,
        modified: NowTime,
        content: PostValue
    };
    console.log(PostData);
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }});
    let a = $.post("<?php echo url()->current() ?>", PostData, function(data){
        alert(data);
    });
}
</script>