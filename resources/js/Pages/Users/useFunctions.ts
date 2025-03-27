export default({

     addSeperator: ( (num:any) => 
    {
        if(!num) return false;
       let number = !num?[0]:num.toString().split(".");
       let cls = number[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",")
     return cls;
    })





})