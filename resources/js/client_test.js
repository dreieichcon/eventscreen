Echo.connect();


Echo.private("public")
    .listen("ReloadAllEvent", (event) => {
        console.log(event);
        console.log("ReloadAll");
        location.reload();
    });

