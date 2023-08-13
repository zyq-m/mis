<?= $this->extend("template/layout") ?>

<?= $this->section("content") ?>

<div class="row">
    <div class="col-md-12">
        <form class="form-horizontal">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 offset-md-4">
                            <h5>Please fill in the Urine Test Request details:</h5>
                        </div>
                        <div class="col-md-4 offset-md-4">
                            <div class=" form-group">
                                <label>Full Name :</label>
                                <div>
                                    <input type="text" id="fullname" class="form-control" name="fullname" placeholder="Please Enter Full Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Date of Birth :</label>
                                <div>
                                    <input type="date" class="form-control" id="dob" name="dob">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Current Symptoms or Concerns :</label>
                                <div>
                                    <textarea rows="3" class="form-control" placeholder="Please Enter Current Symptoms or Concerns"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-search" id="submit">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>