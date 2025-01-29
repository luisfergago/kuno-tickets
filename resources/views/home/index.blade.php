@extends('layouts.app')

@section('body')
<div id="msgInProgress">
    
    <h3>Detecting WCPP utility at client side...</h3>
    <h3>Please wait a few seconds...</h3>
    <br />
</div>
<div id="msgInstallWCPP" style="display:none;">
    <h3>#1 Install WebClientPrint Processor (WCPP)!</h3>
    <p>
        <strong>WCPP is a native app (without any dependencies!)</strong> that handles all print jobs
        generated by the <strong>WebClientPrint for PHP component</strong> at the server side. The WCPP
        is in charge of the whole printing process and can be
        installed on <strong>Windows, Linux, Mac & Raspberry Pi!</strong>
    </p>
    <p>
        <a href="//www.neodynamic.com/downloads/wcpp/" target="_blank" >Download and Install WCPP from Neodynamic website</a><br />
    </p>
    <h3>#2 After installing WCPP...</h3>
    <p>
        <a href="{{url('home/printFGL')}}" >You can go and test the printing page...</a>
    </p>

</div>
@endsection

@section('scripts')
<script type="text/javascript">

    var wcppPingTimeout_ms = 60000; //60 sec
    var wcppPingTimeoutStep_ms = 500; //0.5 sec

                     
    function wcppDetectOnSuccess(){
        // WCPP utility is installed at the client side
        // redirect to WebClientPrint sample page
                
        // get WCPP version
        var wcppVer = arguments[0];
        if(wcppVer.substring(0, 1) == "6")
            window.location.href = '{{url('home/printFGL')}}';
        else //force to install WCPP v6.0
            wcppDetectOnFailure();
    }

    function wcppDetectOnFailure() {
        // It seems WCPP is not installed at the client side
        // ask the user to install it
        $('#msgInProgress').hide();
        $('#msgInstallWCPP').show();
    }

</script>


{!! 

// Register the WCPP Detection script code
// The $wcpScript was generated by HomeController@index

$wcppScript;

!!}

@endsection