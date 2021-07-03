<div class="modal" tabindex="-1" role="dialog" id="modalVNPay">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Sửa thông tin</h5>
            </div>
            <div class="modal-body">
            <form action="/vnpay_php/vnpay_create_payment.php" id="create_form" method="post">       

            <div class="form-group">
                        <label for="language">Loại hàng hóa </label>
                        <select name="order_type" id="order_type" class="form-control">
                            <option value="topup">nạp Xu</option>
                        </select>
                    </div>
                <div class="form-group">
                    <label for="order_id">Mã hóa đơn</label>
                    <input class="form-control" id="order_id" name="order_id" type="text" value="<?php echo date("YmdHis") ?>"/>
                </div>
                <div class="form-group">
                    <label for="amount">Số tiền</label>
                    <input class="form-control" id="amount"
                        name="amount" type="number"/>
                </div>
                <div class="form-group">
                    <label for="order_desc">Nội dung thanh toán</label>
                    <textarea class="form-control" cols="20" id="order_desc" name="order_desc" rows="2" > Nạp Xu</textarea>
                </div>
                <div class="form-group">
                    <label for="bank_code">Ngân hàng</label>
                    <select name="bank_code" id="bank_code" class="form-control">
                        <option value="">Không chọn</option>
                        <option value="NCB"> Ngan hang NCB</option>
                        <option value="AGRIBANK"> Ngan hang Agribank</option>
                        <option value="SCB"> Ngan hang SCB</option>
                        <option value="SACOMBANK">Ngan hang SacomBank</option>
                        <option value="EXIMBANK"> Ngan hang EximBank</option>
                        <option value="MSBANK"> Ngan hang MSBANK</option>
                        <option value="NAMABANK"> Ngan hang NamABank</option>
                        <option value="VNMART"> Vi dien tu VnMart</option>
                        <option value="VIETINBANK">Ngan hang Vietinbank</option>
                        <option value="VIETCOMBANK"> Ngan hang VCB</option>
                        <option value="HDBANK">Ngan hang HDBank</option>
                        <option value="DONGABANK"> Ngan hang Dong A</option>
                        <option value="TPBANK"> Ngân hàng TPBank</option>
                        <option value="OJB"> Ngân hàng OceanBank</option>
                        <option value="BIDV"> Ngân hàng BIDV</option>
                        <option value="TECHCOMBANK"> Ngân hàng Techcombank</option>
                        <option value="VPBANK"> Ngan hang VPBank</option>
                        <option value="MBBANK"> Ngan hang MBBank</option>
                        <option value="ACB"> Ngan hang ACB</option>
                        <option value="OCB"> Ngan hang OCB</option>
                        <option value="IVB"> Ngan hang IVB</option>
                        <option value="VISA"> Thanh toan qua VISA/MASTER</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="language">Ngôn ngữ</label>
                    <select name="language" id="language" class="form-control">
                        <option value="vn">Tiếng Việt</option>
                        <option value="en">English</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary" id="btnPopup">Thanh toán</button>
                <button type="button" class="btn btn-secondary"id="btnClose" data-dismiss="modal">Close</button>

                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    // $('#btnSubmit').on('click',function(){
    //     let name = $('#txtA').val().trim();
    //     let address = $('#txtB').val().trim();
    //     let email = $('#txtC').val().trim();
    //     let phone = $('#txtC').val().trim();
    //     $.ajax({
    //         url:'upProfile.php',
    //         type:'post',
    //         data:{
    //             name:name,
    //             address:address,
    //             email:email,
    //             phone:phone,
    //         },
    //         success:function(data){
    //             console.log(data);
    //         }
    //     })
    // })
    $("#btnPopup").click(function () {
                var postData = $("#create_form").serialize();
                var submitUrl = $("#create_form").attr("action");
                $.ajax({
                    type: "POST",
                    url: submitUrl,
                    data: postData,
                    dataType: 'JSON',
                    success: function (x) {
                        if (x.code === '00') {
                            if (window.vnpay) {
                                vnpay.open({width: 768, height: 600, url: x.data});
                            } else {
                                location.href = x.data;
                            }
                            return false;
                        } else {
                            alert(x.Message);
                        }
                    }
                });
                return false;
            });
</script>