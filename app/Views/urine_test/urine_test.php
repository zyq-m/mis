<?= $this->extend("template/layout") ?>

<?= $this->section("content") ?>

<div class="row">
    <div class="col-md-12">
        <form action="<?= base_url('urine_test') ?>" method="post" class="form-horizontal ui raised segment" id="urineTestForm">
            <?= csrf_field() ?>

            <div class="card">

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="full_name">Full Name:</label>
                                <input type="text" id="full_name" class="form-control" name="full_name" placeholder="Enter Full Name" value="<?= set_value('full_name') ?>">
                            </div>

                            <div class="form-group">
                                <label for="date_of_birth">Date of Birth:</label>
                                <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="<?= set_value('date_of_birth') ?>">
                            </div>

                            <div class="form-group">
                                <label for="descriptions">Current Symptoms or Concerns:</label>
                                <textarea rows="3" class="form-control" placeholder="Enter Current Symptoms or Concerns" name="descriptions"><?= set_value('descriptions') ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <div>
                        <button type="reset" class="btn btn-default" id="reset">Cancel</button>
                        <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                    </div>
                </div>

            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>