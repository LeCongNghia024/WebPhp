<div class="container-fluid">
    <div>
        <a class="btn btn-success" href="index.php?act=post"> ADD POST</a>
        <a class="btn btn-success" href="index.php?act=managepost"> MANAGE POSTS</a>
    </div>
    <div class="body" align= center>
        <h2> ADD POST</h2>
        <div>
            <form action="">
                <div class="form-post" style="height: 85%;">
                    <div>
                        <label class="label" for="">Title</label>
                        <input class="input" type="text">
                    </div>

                    <div>
                        <label class="label" for="">Body</label>
                        <textarea name="body" class="input-body"></textarea>
                    </div>

                    <div>
                        <label class="label" for="">Image</label>
                        <input class="input" style="border: none;" type="file">
                    </div>
                    <div>
                        <label class="label" for="">Topic</label>
                        <input class="input"  type="select">
                    </div>

                    <div style="float:left;" class="mt-4">
                        <input type="checkbox">
                        <label for="">Published</label>
                    </div>
                    
                </div>

                <div class="submit-post" style="height: 15%;">
                    <button type="submit" class="btn btn-warning">SUBMIT</button>
                </div>
            </form>
        </div>
    </div>
</div>
<style>
    .submit-post{
        margin-top: 45px;
        float: right;
    }
    .input-body{
        border-radius: 6px;
        width: 100%;
        height: 350px;
        padding: 0 20px;

    }
    .input{
    border: 1px solid black;
    border-radius: 6px;
    width: 100%;
    height: 40px;
    padding: 0 20px;
    }
    .label {
    float: left;
    font-weight: bold;
    margin-top: 10px;
    display: block;
  }

</style>