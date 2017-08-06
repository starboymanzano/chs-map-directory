/// <reference path="(base_url + 'assets/js/babylon.d.ts')">

var BjsApp = BjsApp || {};

BjsApp.init = function() {

	 if (BABYLON.Engine.isSupported()) {
        var canvas = document.getElementById("renderCanvas");
        var engine = new BABYLON.Engine(canvas, true);

        BABYLON.SceneLoader.Load("", "http://localhost/chs-map-directory/assets/js/babylon/chsmodel.babylon", engine, function (newScene) {
            // Wait for textures and shaders to be ready
            newScene.executeWhenReady(function () {
                // Attach camera to canvas inputs
                newScene.activeCamera.attachControl(canvas);

                // Once the scene is loaded, just register a render loop to render it
                engine.runRenderLoop(function() {
                    newScene.render();
                });
            });
        }, function (progress) {
            // To do: give progress feedback to user
        });
    }



};