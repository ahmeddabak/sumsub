<div id="sumsub-websdk-container"></div>
<script src="https://static.sumsub.com/idensic/static/sns-websdk-builder.js"></script>
<script>
    let snsWebSdkInstance = snsWebSdk.Builder("https://api.sumsub.com", "{{$flow}}")
        .withAccessToken("{{$token}}", (newAccessTokenCallback) => {
            newAccessTokenCallback("{{$getToken($userId)}}");
        }).withConf({
            lang: "en",
            email: null,
            phone: null,
            onMessage: (type, payload) => {
                console.log('WebSDK Message', type, payload)
            },
            onError: (error) => {
                console.log('WebSDK Error', error)
            },
        }).build()

    snsWebSdkInstance.launch('#sumsub-websdk-container')
</script>
