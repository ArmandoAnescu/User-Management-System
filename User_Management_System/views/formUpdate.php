<link rel="stylesheet" href="bootstrap.min.css">


<form action="controller/updateRecord.php">
    <div class="form-group row">
        <label for="username" class="col-sm-2 col-form-label">Username</label>
        <div class="col-sm-10">
            <input required type="text" class="form-control"name="username" id="username" placeholder="User name">
        </div>
    </div>

    <div class="form-group row">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input required type="email" class="form-control" name="email" id="email" placeholder="Email">
        </div>
    </div>

    <div class="form-group row">
        <label for="fiscalcode" class="col-sm-2 col-form-label">Fiscal Code</label>
        <div class="col-sm-10">
            <input required type="text" class="form-control" name="fiscalcode" id="fiscalcode" placeholder="FISCALCODE">
        </div>
    </div>

    <div class="form-group row">
        <label for="age" class="col-sm-2 col-form-label">Age</labe>
        <div class="col-sm-10">
            <input required type="range" min="0" max="100"class="form-control" id="age" name="age" placeholder="Age">
        </div>
    </div>

    <div class="form-group row">
       
        <div class="col-auto">
        <button onclick="return confirm('Vuoi eliminare lo user?')" class="btn btn-danger" href="<?=$deleteUrl?>?page=<?=$pageI?>&id=<?=$utente['id']?>&action=delete&<?=$params?>">
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