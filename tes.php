<link type="text/css" href="css/datepicker.css" rel="stylesheet">

<div class="form-group floating-label-form-group controls mb-0 pb-2">
    <label>Tanggal Lahir</label>
    <input class="form-control datepicker" id="tanggal" name="tanggal_lahir" type="text" placeholder="Masukan Tanggal" required="required">
    <p class="help-block text-danger"></p>
</div>

<script src="js/bootstrap-datepicker.js"></script>

<script>
    $(function() {
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd'
        });
    });
</script>