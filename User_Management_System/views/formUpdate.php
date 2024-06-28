
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>


<form enctype="multipart/form-data" id="updateForm" action="controller/updateRecord.php?<?=$defaultParams?>" method="post">
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

    <div class="form-group">
        <?php
        $avatarDir=getConfig('webAvatarDir');
        $thumbWidth=getConfig('thumbnail_width',200);
        $avatarImg=file_exists($avatarDir.'thumb_'.$user['avatar'])? $avatarDir.'thumb_'.$user['avatar']: $avatarDir.'default.jpg';

        ?>
        <label for="avatar" class="col-sm-2 col-form-label">Avatar</label>
        <div class="col-sm-10">
        <img src="<?=$avatarImg?>" alt="Avatar" >
        </div>
    </div>

    <div class="form-group row">
        <label for="avatar" class="col-sm-2 col-form-label">Avatar</label>
        <div class="col-sm-10">
            <input type="hidden" name="MAX_FILE_SIZE" value="300000"/>
            <input required type="file" min="0"  onchange="previewFile" max="100"class="form-control form-control-lg" name="avatar" accept="image/jpeg">
        </div>
    </div>

    <div class="form-group row">
       <div class="col-sm-2"></div>
       <?php if($user['id']){?>

        <div class="col-auto">
        <a href="<?=$deleteUrl?>?id=<?=$user['id']?>&action=delete" class="btn btn-danger"> 
        <i class="fa fa-trash"></i>
        DELETE
        </a>
        </div>
        <?php  } ?>

        <div class="<?=$user['id']?'col-sm-5':'col-sm-12'?> text-center">

        <button class="btn btn-success">
            <i class="fa fa-pen"></i>
            <?php echo $action==='insert'?'SAVE':'UPDATE' ?>

        </button>
        </div>
    </div>
</form>
