<template>

<MainHeader />
<HeaderMobile />

<slot name="content"></slot>

<MainFooter />
<MobileNav />
<MobileSideBar />

</template>


<script setup="">
import MainHeader from "./Components/Header.vue"
import MobileNav from "./Components/MobileNav.vue"
import MainFooter from "./Components/Footer.vue"
import HeaderMobile from "./Components/MobileHeader.vue"
import MobileSideBar from "./Components/MobileSidebar.vue"
</script>