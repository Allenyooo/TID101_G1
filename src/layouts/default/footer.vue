<template>
    <footer>
        <!--Logo-->
        <img src="/src/assets/Image/navAndFooter/footer/footerLogo.svg" alt="footerLogo">
        <!--聲明-->
        <p>©Li_Hua_Dian Co. All rights reserved.<br>            
        本網站為緯育 TibaMe 【第91期】前端工程師專業技術養成班學員作品，僅供學習、展示之用途。</p>
        <!--聯絡我們-->
        <div class="contact">
            <img src="/src/assets/Image/navAndFooter/footer/mail_icon.png" alt="mail">
            <h5>聯絡我們</h5>
        </div>
    </footer>
</template>

<script></script>

<style lang="css" scoped>
    footer{
        height: 80px;
        width: 100vw;
        background-color: #333;
        display: flex;
        justify-content: space-between;
        align-items: center;
        position: absolute;
        bottom: 0;
    }
    img{
        margin-left: 49px;
        top: 12px;
    }
    p{
        font-size: 12px;
        font-weight: 400px;
        color: white;
        text-align: center;
        font-family: noto serif tc;
        margin-top: 22px;
        margin-bottom: 22px;
    }
    .contact{
        display: flex;
        align-items: center;
    }
    .contact img{
        scale: 0.8;
        margin: 25px 8px 27px 0px;
    }
    .contact h5{
        margin: 27px 44px 30px 0px;
        color: #fff;
        font-weight: 800;
        font-size: 16px;
        font-family: noto serif tc;
    }
</style>