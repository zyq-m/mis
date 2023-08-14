<?= $this->extend("template/layout") ?>

<?= $this->section("content") ?>

<div class="row">
    <div>
        <form action="<?= base_url('urine_test') ?>" method="post" class="form-horizontal ui raised segment" id="urineTestForm">
            <?= csrf_field() ?>
            <div class="card">
                <div class="card-body">
                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Full Name:</label>
                                <input type="text" id="fullname" class="form-control" name="fullname" placeholder="Please Enter Full Name" required>
                            </div>
                            <div class="form-group">
                                <label>Date of Birth:</label>
                                <input type="date" class="form-control" id="dob" name="dob" required>
                            </div>
                            <div class="form-group">
                                <label>Current Symptoms or Concerns:</label>
                                <textarea rows="3" class="form-control" placeholder="Please Enter Current Symptoms or Concerns" name="descriptions" required></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div>
                        <button type="reset" class="btn btn-danger btn-reset" id="reset">Reset</button>
                        <button type="submit" class="btn btn-primary btn-submit" id="submit">Submit Request</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>