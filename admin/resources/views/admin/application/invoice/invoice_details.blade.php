<div class="form-group">
    <label>Issue date</label>
    <div>
        <input type="date" name="issue_date"  value="{{ $invoice->issue_date }}"  required class="form-control">
        <input type="hidden" name="application_id" value="{{$invoice->application_id }}"
            required class="form-control">
    </div>
</div>


<div class="form-group">

    <label>Due date</label>
    <div>
        <input type="date" name="due_date"   value="{{ $invoice->due_date }}"   required class="form-control">
    </div>
</div>

<div class="form-group">

    <label>percetnage(%)</label>
    <div>
        <input type="text" name="percentage"   value="{{ $invoice->percentage }}"  id="percetnage"required class="form-control">
    </div>
</div>

<span style=" font-size:20px; color:red"> Total Amount:
    {{ $application->sub_total }}</span>
<div class="form-group">
    <label>Amount</label>
    <div>
        <input type="number" step="any" disabled id="amount2" readonly
            value="{{ $invoice->amount }}" required class="form-control">
    </div>
</div>

<input type="hidden" id="amount" name="amount">

<div class="form-group">
    <label style="font-size:20px">RecivedFrom (cliant) </label>
    <div>
        <input type="checkbox" id="switch3" switch="default">
        <label for="switch3" id="switchText" style="background-color: #45cb85;"
            data-on-label="Yes" data-off-label="No"></label>
    </div>

    <div style="display:none" id="client_other">
        <input type="text" name="received _form" value=""
            placeholder="Give Reciver   name" class="form-control">
    </div>
</div>
<div class="form-group">

    <label>Payment Date</label>
    <div>
        <input type="date" name="payment_date"   value=""   required class="form-control">
    </div>
</div>




<script type="text/javascript">
     $('[type="checkbox"]').click(function(e) {
            var isChecked = $(this).is(":checked");
            console.log('isChecked: ' + isChecked);

            if(isChecked){
                $("#client_other").show();

            }else{
                $("#client_other").hide();
            }

            });

        var total = "<?php echo  $application->sub_total ?> ";
        $("#percetnage").on("change", function() {
                var ret = ( total * parseInt($("#percetnage").val() ) ) / 100;
                    $("#amount").val(ret);
                    $("#amount2").val(ret);
            })
</script>
