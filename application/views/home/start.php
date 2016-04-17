<?php include_once APPPATH . 'views/include/header.php'; ?>
<body>
    <div class="container">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h5>Urutkan huruf berikut menjadi kata yang benar</h5>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" onsubmit="return submit_jawaban()">
                    <input type="hidden" name="word_id" id="word_id">
                    <div class="form-group"><label class="col-sm-2 control-label text-left text-primary">Score <span id="nilai">1</span></label></div>
                    <div class="form-group" id="div-jawaban">
                        <label class="col-sm-2 control-label text-left text-success" id="pertanyaan"></label>
                        <div class="col-sm-4">
                            <span id="span-error" aria-hidden="true"></span>
                            <input autofocus autocomplete="off" type="text" name="jawaban" id="jawaban" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-4">
                            <button class="btn btn-success">Submit &raquo;</button>
                            <button class="btn btn-warning" onclick="location.href='<?php echo base_url() ?>'" >Reset</button>
                        </div>
                    </div>
                </form>    
            </div>
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
                $('#jawaban').focus();
                search();
            } else {
                $('#span-error').addClass('glyphicon glyphicon-remove form-control-feedback');
                $('#div-jawaban').addClass('has-error has-feedback');
                alert('Jawaban anda salah');
                $('#jawaban').focus();
                $('#jawaban').val('');
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