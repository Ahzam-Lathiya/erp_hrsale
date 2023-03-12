FetchClass = 
{
    controller : new AbortController(),
    signal: null,
    timeout_flag: true,
    max_duration: 3000,
    url: '',
    headers: null,

    get_controller : function()
    {
        return this.controller;
    },

    return_callback_get_controller : function()
    {
        controller = 'Chungus';

        get_controller = function()
        {
            return this.controller;
        }.bind(this);

        return function(){
            return this.get_controller();
        };
    },

    return_get_controller : function()
    {
        return this.get_controller();
    },

    return_external_get_controller : function()
    {
        return this.return_get_controller();
    },

    refresh_controller : function()
    {
        this.controller = new AbortController();
        this.signal = this.controller.signal;
    },

    set_url : function(url)
    {
        this.url = url;
    },

    set_payload: function(data)
    {
        this.payload = data;
    },

    set_headers: function(data={})
    {
        if(this.headers == null)
        {
            this.headers = new Headers({
                'credentials': 'include',
            });
        }
        for(let record in data)
        {
            this.headers.set(record, data[record]);
        }
    },

    set_url_params: function(data={})
    {
        let url = new URL(this.url);

        for(let record in data)
        {
            url.searchParams.set(record, data[record]);
        }
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
        try
        {
            this.timeout_flag = true;
            this.refresh_controller();
            this.start_request_countdown();

            let options = {
                method: 'POST',
                signal: this.signal,
                headers: this.headers,
                body: this.payload,
            };

            let promise = await fetch(this.url, options);

            let response = await promise.json();

            return response;
        }

        catch(e)
        {
            return e;
        }
    },

    fetch_get : async function()
    {
        try
        {
            this.timeout_flag = true;
            this.refresh_controller();
            this.start_request_countdown();

            let options = {
                method: 'GET',
                signal: this.signal,
                headers: this.headers
            };

            let promise = await fetch(this.url, options);

            let response = await promise.json();

            return response;
        }

        catch(e)
        {
            return e;
        }
    },

    call_request : function(success, fallback, method="post")
    {
        if(method == 'get')
        {
            return this.fetch_get()
            .then(function(response)
            {
                this.negate_timeout_flag();
                success(response);
    
            }.bind(this))
            .catch(function(error)
            {
                this.refresh_controller();
                fallback(error);
    
            }.bind(this));    
        }

        return this.fetch_post()
        .then(function(response)
        {
            this.negate_timeout_flag();
            success(response);

        }.bind(this))
        .catch(function(error)
        {
            this.refresh_controller();
            fallback(error);

        }.bind(this));
    },

    on_request_success: function(api_response)
    {
        console.log(api_response);
        this.negate_timeout_flag();
    },

    on_request_failure: function( error){
        console.log(error);
        this.refresh_controller();
    },

    start_request_countdown: function()
    {
        setTimeout(this.timeout_callback.bind(this), this.max_duration);
    },

    timeout_callback : function()
    {
        if(this.timeout_flag)
        {
            this.abort_controller();
        }
    },
};