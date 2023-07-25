<style>
    .fail {
        position: fixed;
        top: 20px;
        left: 20px;
        right: 20px;
        padding: 12px;
        display: flex;
        z-index: 9999999;
        flex-direction: row;
        align-items: center;
        justify-content: start;
        background: rgba(253, 196, 177, 0.9);
        border-radius: 8px;
        box-shadow: 0px 0px 5px -3px #111;
    }

    .success {
        position: fixed;
        top: 20px;
        left: 20px;
        right: 20px;
        padding: 12px;
        display: flex;
        z-index: 9999999;
        flex-direction: row;
        align-items: center;
        justify-content: start;
        background: rgba(231, 252, 172, 0.9);
        border-radius: 8px;
        box-shadow: 0px 0px 5px -3px #111;
    }

    .info {
        position: fixed;
        top: 20px;
        left: 20px;
        right: 20px;
        padding: 12px;
        display: flex;
        z-index: 9999999;
        flex-direction: row;
        align-items: center;
        justify-content: start;
        background: rgba(177, 228, 253, 0.9);
        border-radius: 8px;
        box-shadow: 0px 0px 5px -3px #111;
    }

    .fail_text {
        font-weight: 500;
        font-size: 14px;
        color: #700b2e;
    }

    .success_text {
        font-weight: 500;
        font-size: 14px;
        color: #386f09;
    }

    .info_text {
        font-weight: 500;
        font-size: 14px;
        color: #0b2a70;
    }

    .iconsizefail {
        color: #eb3b3b;
        padding-inline: 10px;
        transform: scale(10px);
    }

    .iconsizesuccess {
        color: #a2e831;
        padding-inline: 10px;
        transform: scale(10px);
    }

    .iconsizeinfo {
        color: #3b96eb;
        padding-inline: 10px;
        transform: scale(10px);
    }
</style>



@if (Session::has('fail'))
<div id="notif" class="fail">
    <div>
        <i class="iconsizefail fa-solid fa-circle-exclamation"> </i>
    </div>
    <div class="fail_text"> {{Session::get('fail')}}</div>
</div>
@elseif (Session::has('success'))
<div id="notif" class="success">
    <div>
        <i class="iconsizesuccess fa-solid fa-circle-check"> </i>
    </div>
    <div class="success_text"> {{Session::get('success')}}</div>
</div>
@elseif (Session::has('info'))
<div id="notif" class="info">
    <div>
        <i class="iconsizeinfo fa-solid fa-circle-info"></i>
    </div>
    <div class="info_text">{{Session::get('info')}}</div>
</div>
@endif