// DP Singleton permettant de récupérer l'instance de l'éditeur pour la gestion
// évenementielle
var EditorContainer = (function() {
    var constructor = function() {

        this.getEditor = function(editor) {
           return this.editor;
        }

        this.setEditor = function(editor) {
            this.editor = editor;
        }

        var editor;
    }

    var instance = null;

    return new function() {
        this.get = function() {
            if (instance == null) {
                instance = new constructor();
                instance.constructor = null;
            }

            return instance;
        }
    }
})();

//Alternance Preview / Edition
function toggleEditor() {
    var editor =  EditorContainer.get().getEditor();

    var button = window.document.getElementById('button-toggle');

    if (editor.is('preview')) {
        editor.edit();
        button.innerHTML = "Preview";
    } else {
        editor.preview();
        button.innerHTML = "Edit";
    }
}

function saveNote() {
    alert("Note sauvée");
}

function deleteNote () {
    if (confirm("Voulez vous vraiment supprimer la note ?")) {
        alert("Note effacé");
    }
}

function addTagToggleOn() {
    window.document.getElementById("addTag").parentNode.innerHTML =
        '<input type="text" id="addTagInput" placeholder="Add Tag"/>';

    window.document.getElementById("addTagInput").focus();

    window.document.getElementById("addTagInput").addEventListener("blur", addTagToggleOff, false);
    window.document.getElementById("addTagInput").addEventListener("change", addNewTag, false);
}

function addTagToggleOff() {
    window.document.getElementById("addTagInput").parentNode.innerHTML =
        '<a href="#" id="addTag"><i class="fa fa-tags"></i> Add Tag</a>';

    window.document.getElementById('addTag').addEventListener("click", addTagToggleOn, false);
}

function addNewTag() {
    var tags = window.document.getElementById("addTagInput").value;

    tags = tags.split(',');

    tags.forEach(function(element, index, array) {
        var newTag = document.createElement("li");
        newTag.innerHTML = '<a href="#">' + element.trim() + '  <i class="fa fa-angle-down"></i></a>';
        window.document.getElementById("tag-list").appendChild(newTag);
    });
}