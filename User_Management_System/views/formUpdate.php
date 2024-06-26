<link rel="stylesheet" href="css/bootstrap.min.css">


<form action="controller/updateRecord.php" method="post">
    <div class="form-group row">
        <input required type="hidden"  value="<?=$user['id']?>"  name="id">
        <input required type="hidden"  value="<?=$user['id']?'store':'save' ?>"  name="action"placeholder="User name">
        <label for="username" class="col-sm-2 col-form-label">Username</label>
        <div class="col-sm-10">
            <input required type="text" class="form-control form-control-lg" value="<?=$user['username']?>"  name="username" id="username" placeholder="User name">
        </div>
    </div>

    <div class="form-group row">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input required type="email" class="form-control form-control-lg"value="<?=$user['email']?>" name="email" id="email" placeholder="Email">
        </div>
    </div>

    <div class="form-group row">
        <label for="fiscalcode" class="col-sm-2 col-form-label">Fiscal Code</label>
        <div class="col-sm-10">
            <input required type="text" class="form-control form-control-lg"value="<?=$user['fiscalcode']?>" name="fiscalcode" id="fiscalcode" placeholder="FISCALCODE">
        </div>
    </div>

    <div class="form-group row">
        <label for="age" class="col-sm-2 col-form-label">Age</label>
        <div class="col-sm-10">
            <input required type="number" min="0" max="100"class="form-control form-control-lg"value="<?=$user['age']?>" id="age" name="age" placeholder="Age">
        </div>
    </div>

    <div class="form-group row">
       <div class="col-sm-2"></div>
        <div class="col-auto">
        <button onclick="return confirm('Vuoi eliminare lo user?')" class="btn btn-danger">
        <i class="fa fa-trash"></i>
        DELETE
        </button>
        </div>

        <div class="col-auto">
        <button class="btn btn-success">
            <i class="fa fa-pen"></i>
            UPDATE
        </button>
        </div>
    </div>
</form>