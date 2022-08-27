
const formBuilder = document.getElementById("formbuilder_container")
const data = JSON.parse(formBuilder.dataset.fields)

$(formBuilder).formBuilder({
    defaultFields: data,
    disableFields: ["hidden", "button", "autocomplete", "paragraph", "radio-group"],
    disabledAttrs: ['className', 'access', 'step', 'multiple', 'description'],
    disabledActionButtons: ['data'],
    i18n: {
        override: {
            "en-US": {
                NATIVE_NAME: "Français",
                ENGLISH_NAME: "French",

                addOption: "Ajouter une Option",
                allFieldsRemoved: "Tous les champs ont été supprimés.",
                allowMultipleFiles:
                    "Autoriser les utilisateurs à uploader plusieurs fichiers",
                allowSelect: "Autoriser la sélection",
                autocomplete: "Auto-complétion",

                button: "Bouton",
                cannotBeEmpty: "Ce champ ne peut pas être vide",
                checkboxGroup: "Groupe de cases à cocher",
                checkbox: "Case à cocher",
                checkboxes: "Cases à cocher",
                className: "Classe",
                clearAllMessage:
                    "Etes-vous sur de vouloir vider tous les champs?",
                clear: "Vider",
                close: "Fermer",
                content: "Contenu",
                copy: "Dupliquer",
                copyButton: "Bouton copier",
                copyButtonTooltip: "Copier",
                dateField: "Champ de type date",
                description: "Texte de description",
                descriptionField: "Description",
                devMode: "Mode Developpeur",
                editNames: "Editer les noms",
                editorTitle: "Elements de formulaire",
                editXML: "Editer le XML",
                enableOther: "Droit Utilisateur",
                enableOtherMsg:
                    "Permettre ajout de ces options supplémentaires",
                fieldDeleteWarning: "faux",
                fieldVars: "Variables de champ",
                fieldNonEditable: "Ce champ ne peut pas être édité",
                fieldRemoveWarning:
                    "Etes-vous sur de vouloir supprimer ce champ ? ",
                fileUpload: "Champ de type fichier",
                formUpdated: "Le formulaire a été mis à jour",
                getStarted:
                    "Glisser-déposer un champ de la liste de droite vers cette zone",
                header: "Titre",
                hide: "Cacher",
                hidden: "Caché",

                inline: "aligné",
                inlineDesc: "Afficher les boutons en ligne",
                label: "Label",
                labelEmpty: "Le Label ne peut pas etre vide",
                limitRole:
                    "Limiter acces à un ou plusieurs des rôles suivants:",
                mandatory: "Obligatoire",
                maxlength: "Longueur max.",
                minOptionMessage: "Ce champ nécessite au moins 2 options",
                minSelectionRequired: "Selection minimal requise",
                multipleFiles: "Champs Multiples",
                name: "Nom",
                no: "Non",
                noFieldsToClear: "Aucun champ à nettoyer",
                number: "Champ de type nombre",
                off: "Off",
                on: "On",
                option: "Option",
                options: "Options",
                optional: "optionnel",
                optionEmpty: "Une valeur est exigée",
                optionLabelPlaceholder: "Label",
                optionValuePlaceholder: "Valeur par défaut",
                paragraph: "Paragraphe",

                placeholder: "renseigner un texte indicatif par défaut",
                "placeholder.value": "Valeur par défaut",
                "placeholder.label": "Label",
                "placeholder.text": "Saisir du Texte",
                "placeholder.textarea": "Saisir un Texte long",
                "placeholder.email": "Saisir votre adresse email",
                "placeholder.placeholder": "Exemple de valeur attendue",
                "placeholder.className": "classes séparées par des espaces",
                "placeholder.password": "Saisir votre mot de passe",
                preview: "Pré-visualisation",
                radioGroup: "Groupe de Boutons Radio",
                radio: "Bouton Radio",
                removeOption: "Supprimer cet option",
                removeMessage: "Supprimer élément",
                removeOption: "Supprimer une option",
                remove: "Supprimer",
                richText: "Editeur de texte",
                required: "donnée exigée",

                rows: "Lignes",
                roles: "Accès",
                rows: "Lignes",
                save: "Enregistrer",
                selectOptions: "Options",
                select: "Champ de sélection",
                selectColor: "Couleur de sélection",

                selectionsMessage: "Autorise la sélection multiple",
                size: "Taille",
                sizes: "Tailles",
                "sizes.xs": "Très petit",
                "sizes.sm ": "Petit",
                "sizes.m": "Défaut",
                "sizes.lg": "Large",
                step: "Pas",
                Style: "Style",
                styles: "Styles",
                "styles.btn": "Styles de Bouton",
                "styles.btn.default": "Défaut",
                "styles.btn.danger": "Danger",
                "styles.btn.info": "Info",
                "styles.btn.primary": "Primaire",
                "styles.btn.success": "Succès",
                "styles.btn.warning": "Attention",
                submit: "Soumettre",

                subtype: "Sous-type",
                text: "Champ de saisie de texte",
                textArea: "Zone de texte",
                toggle: "Activer/désactiver",
                warning: "Attention!",
                value: "Valeur",
                viewXML: "</>",
                viewJSON: "{ }",
                yes: "Oui",
            },
        },
    },

    onSave: function (event, data) {
        const form_uid = document.querySelector(
            'input[name="form_uid"]'
        ).value;
        const parsedData = JSON.parse(data)
        const fieldsNamesList = parsedData.map(field => {
            return field.name
        })

        const formData = new FormData();
        formData.append("form_uid", form_uid);
        formData.append("data", data);
        formData.append("fields_names_list", JSON.stringify(fieldsNamesList))

        fetch(`${location.origin}/app/edit_formbuilder`, {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": document.querySelector(
                    'meta[name="csrf-token"]'
                ).content,
            },
            body: formData,
        }).then((res) => {
            if (res.status === 200 || res.status === 201) {
                res.json()
                .then(data => {
                    location.href = `${location.origin}/app/form_edit/${data.event_uid}`;
                })
            }
        });
    },
});