<?php include_once APPPATH . 'views/include/header.php'; ?>
<body>
    <div class="container">
        <!-- Static navbar -->
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="<?php echo base_url() ?>">Scramble Word</a>
                </div>
            </div><!--/.container-fluid -->
        </nav>

        <!-- Main component for a primary marketing message or call to action -->
        <div class="jumbotron">
            <h4>Urutkan huruf berikut menjadi kata yang benar</h4>
            <form class="form-horizontal" onsubmit="return submit_jawaban()">
                <input type="hidden" name="word_id" id="word_id">
                <div class="form-group"><label class="col-sm-2 control-label text-left">Score <span id="nilai">0</span></label></div>
                <div class="form-group">
                    <label class="col-sm-2 control-label text-left" id="pertanyaan"></label>
                    <div class="col-sm-4">
                        <input autofocus autocomplete="off" type="text" name="jawaban" id="jawaban" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-4">
                        <button class="btn btn-default">Submit &raquo;</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
    
<script type="text/javascript">
function submit_jawaban() {
    $.ajax({
        type        : "POST",
        url         : BASE_URL + 'search',
        dataType    : 'JSON',
        data        : {
            type        : 'check_answer',
            category    : '<?php echo $this->input->get('category') ?>',
            question    : $('#word_id').val(),
            answer      : $('#jawaban').val()
        },
        success     : function(result) {
            if (result.success) {
                alert('Jawaban anda benar');
                $('#nilai').html(parseInt($('#nilai').html())+1); 
                $('#jawaban').val('');
                search();
            } else {
                alert('Jawban anda salah');
                $('#nilai').html($('#nilai').html()-1); 
            }
        }
    });
    return false;
}


function search() {
    $.ajax({
        type        : "POST",
        url         : BASE_URL + 'search',
        dataType    : 'JSON',
        data        : {
            type        : 'get_data',
            category    : '<?php echo $this->input->get('category') ?>',
        },
        success     : function(result) {
            $('#word_id').val(result.id);
            $('#pertanyaan').text(result.scramble);
        }
    })
}
$(document).ready(function() {
    search()
    // parent.location.hash = '1';
    // $('#id_pertanyaan').html(parent.location.hash);
});
</script>
</html>