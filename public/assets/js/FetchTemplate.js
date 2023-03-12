FetchTemplate = 
{
    controller : new AbortController(),
    // signal: null,
    // timeout_flag: true,
    duration: 3000,

    // constructor(duration = 30000, url='', options={
    //     method:'POST',
        
    // })
    // {
    //     this.duration = duration;
    //     this.controller = new AbortController();
    //     this.signal = this.controller.signal;
    //     this.timeout_flag = false;
    //     this.url = url;
    // }

    get_controller : function()
    {
        console.log(this.controller);
    },

    refresh_controller : function()
    {
        console.log("refreshing");
        this.controller = new AbortController();
        this.signal = this.controller.signal;
    },

    set_payload: function(data)
    {
        this.payload = data;
    },

    abort_controller: function()
    {
        console.log("Aborting")
        console.log(this.controller);
        this.controller.abort();
    },

    negate_timeout_flag : function()
    {
        console.log("Negating");
        this.timeout_flag = false;
    },

    fetch_post : async function()
    {
        this.timeout_flag = true;
        this.refresh_controller();
        this.start_request_countdown();

        let options = {
            method: 'POST',
            body: this.payload,
            signal: this.signal,
        };

        let promise = await fetch('http://127.0.0.1/login/authenticate', options);

        let response = await promise.json();

        return response;
    },

    call_request : function(success, fallback)
    {
        this.fetch_post()
        .then(this.on_request_success.bind(this, success ))
        .catch(this.on_request_failure.bind(this, fallback));
    },

    on_request_success: function(success)
    {
        this.negate_timeout_flag();
        success();
    },

    on_request_failure: function( fallback){

        this.refresh_controller();

        fallback();
    },

    start_request_countdown: function()
    {
        console.log("Setting Duration for:" + this.duration + " With flag: " + this.timeout_flag);
        setTimeout(this.timeout_callback.bind(this, this.timeout_flag), this.duration);
    },

    timeout_callback : function(flag){
        console.log("Finally run after:" + this.duration);
        if(flag)
        {
            //abort();
            this.abort_controller();
        }
    },
};