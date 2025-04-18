export default({

     addSeperator: ( (num) => 
    {
        if(!num) return '₦'+0;
       let number = !num?[0]:num.toString().split(".");
       let cls = number[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",")
     return '₦'+cls;
    })





})