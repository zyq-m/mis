<div class="modal fade" role="dialog" id="imgmodal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <img class="img-fluid" src="" id="show-img">
        </div>
    </div>
</div>

<?= $this->section('scripts') ?>
<script>
    $(document).ready(function() {
        $("img").click(function() {
            const img = $(this).attr('src');

            $("#show-img").attr('src', img);
            $("#imgmodal").modal('show');
        });
    });
</script>
<?= $this->endSection(); ?>