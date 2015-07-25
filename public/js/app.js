// Backbone Model

var User = Backbone.Model.extend({
    urlRoot: '/users',
    defaults: {
        firstname: '',
        lastname: '',
        email: ''
    },
    validate: function( attrs ) {
        console.log(attrs);
        if ( attrs.firstname == '' || attrs.lastname == '' || attrs.email == '') {
            alert('all fields are required');
            return 'all fields are required';
        }
    }
});


// Backbone Collection

var Users = Backbone.Collection.extend({
    url: '/users'
});


//instantiate collection

var users = new Users();


// Backbone Views for one user

var UserView = Backbone.View.extend({
    model: new User(),
    tagName: "tr",
    initialize: function(){
        this.template = _.template($('.users-list-template').html());
    },
    events: {
        'click .edit-user': 'edit',
        'click .update-user': 'update',
        'click .cancel': 'cancel',
        'click .delete-user': 'delete'
    },
    edit: function () {
        this.$('.edit-user').hide();
        this.$('.delete-user').hide();
        this.$('.update-user').show();
        this.$('.cancel').show();

        var firstname = this.$('.firstname').html();
        var lastname = this.$('.lastname').html();
        var email = this.$('.email').html();
        var id = this.$('.user-id').html();

        this.$('.firstname').html('<input type="text" class="form-control firstname-update" value="' + firstname + '">');
        this.$('.lastname').html('<input type="text" class="form-control lastname-update" value="' + lastname + '">');
        this.$('.email').html('<input type="text" class="form-control email-update" value="' + email + '">');

    },
    update: function(){
        this.model.set('firstname', $('.firstname-update').val());
        this.model.set('lastname', $('.lastname-update').val());
        this.model.set('email', $('.email-update').val());
        this.model.save();
    },
    cancel: function () {
        usersView.render();
    },
    delete: function () {
        this.model.destroy();
    },
    render: function(){
        this.$el.html(this.template(this.model.toJSON()));
        console.log('init user one view - '); // DEBUG
        return this;
    }
});


// Backbone Views for all users

var UsersView = Backbone.View.extend({
    model: users,
    el: $(".users-list"),
    initialize: function() {

        var self = this;
        this.model.on('add', this.render, this);
        this.model.on('change', function() {
            setTimeout(function(){
                self.render();
            }, 30);
        }, this);
        this.model.on('remove', this.render, this);
    },
    render: function(){
        var self = this;
        this.$el.html('');
        _.each(this.model.toArray(), function(user){
            self.$el.append( (new UserView({model: user})).render().$el );
        });
        console.log('init users ALL view -- '); // DEBUG
        return this;
    }
});

var usersView = new UsersView();

var Router = Backbone.Router.extend({

    routes: {
        "users": "users",
        "books": "books"
    },

    users: function() {
        console.log('Роут Users !');
    },

    books: function() {
        console.log('Роут Books!');
    }

});

//new Router();

Backbone.history.start();

$(document).ready(function(){
    users.fetch();

    $('.add-user').on('click', function(){
        var user = new User({
            firstname:  $('.firstname-input').val(),
            lastname:   $('.lastname-input').val(),
            email:      $('.email-input').val()
        });
        $('.firstname-input, .lastname-input, .email-input').val('');

        user.save();
        users.add(user.model);

    });

});