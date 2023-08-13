<?= $this->extend("template/layout") ?>

<?= $this->section("content") ?>

<div class="row">
    <div class="col-md-12">
        <form class="form-horizontal">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 offset-md-4">
                            <h5>Please fill in the Image Upload details:</h5>
                        </div>
                        <div class="col-md-4 offset-md-4">
                            <div class=" form-group">
                                <label>Upload Image:</label>
                                <div>
                                    <input type="file" name="memoimg" (change)="fileEvent($event)" class="inputfile" id="embedpollfileinput">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Comment:</label>
                                <div>
                                    <textarea rows="3" class="form-control" placeholder="Please Enter Current Symptoms or Concerns"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="text-center">
                        <button type="reset" class="btn btn-danger btn-reset" id="reset">Reset</button>
                        <button type="submit" class="btn btn-primary btn-submit" id="submit">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
</script>

<?= $this->endSection() ?>