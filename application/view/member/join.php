`
<div class="container pt-5">


    <h2 class="mt-5">회원 추가</h2>
    <hr>
    <form action="" method="post">
        <input type="hidden" name="action" value="join">
        <div class="mb-5">
        <div class="form-row">
            <div class="col-md-3 mb-3">
                <label for="">아이디</label>
                <input type="text" class="form-control" name="id" placeholder="gondr" >
            </div>
            <div class="col-md-3 mb-3">
                <label for="">이름</label>
                <input type="text" class="form-control" name="name" placeholder="최선한" >
            </div>
          <!--   <div class="col-md-3 mb-3">
                <label for="">회원구분</label>
                <select class="form-control" name="admin">
                    <option value="1">관리자</option>
                    <option value="0">사용자</option>
                </select>
            </div> -->
            <div class="col-md-3 mb-3">
                <label for="">비밀번호</label>
                <input type="text" class="form-control" name="pw" placeholder="1234" >
            </div>
        </div>
        <button type="submit" class="btn btn-primary float-right">추가</button>

    </div>
    </form>
</div>

</body>
</html>