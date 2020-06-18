<div class="form-group">
    <label for=""></label>
    <input type="file" class="form-control-file" name="file" id="file1" placeholder="" aria-describedby="fileHelpId">
    <small id="errorBlock" class="form-text text-muted text-danger">Help text</small>
</div>

<script>
    $("#file1").fileinput({
        'maxFileSize': 25000,
        'maxFileCount': 1,
        'uploadUrl': '<?= base_url("dev/upload") ?>',
        'elErrorContainer': '#errorBlock',
        'uploadAsync': true,
        uploadExtraData: function() {
            return {
                file: $("#file1").val()
            };
        }
    });
</script>