/*
*
* Users
*
*/

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
            return 'All fields are required';
        }
    }
});


// Backbone Collection

var Users = Backbone.Collection.extend({
    url: '/users',
    model: User
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
        $(this.el).html(this.template(this.model.toJSON()));
        return this;
    }
});


// Backbone Views for all users

var UsersView = Backbone.View.extend({
    model: users,
    el: $(".users-list"),
    initialize: function() {
        this.model.on('sync', this.render, this);
        this.model.on('remove', this.render, this);
        this.model.on('invalid', function(error, message){
            alert(message);
        }, this);
        this.model.on('error', function (error, message) {
            alert(message.responseText);
        }, this);
    },
    render: function(){
        var self = this;
        $(this.el).html('');
        _.each(this.model.toArray(), function(user){
            $(self.el).append( (new UserView({model: user})).render().el );
        });
        return this;
    }
});

var usersView = new UsersView();


/*
 *
 * Books
 *
 */

// Backbone Model

var Book = Backbone.Model.extend({
    urlRoot: '/books',
    defaults: {
        title: '',
        author: '',
        year: '',
        genre: ''
    },
    validate: function( attrs ) {
        console.log(attrs);
        if ( attrs.title == '' || attrs.author == '' || attrs.year == '' || attrs.genre == '') {
            return 'all fields are required';
        }
    }
});


// Backbone Collection

var Books = Backbone.Collection.extend({
    url: '/books',
    model: Book
});


//instantiate collection

var books = new Books();


// Backbone Views for one book

var BookView = Backbone.View.extend({
    model: new Book(),
    tagName: "tr",
    initialize: function(){
        this.template = _.template($('.books-list-template').html());
    },
    events: {
        'click .edit-book': 'edit',
        'click .update-book': 'update',
        'click .cancel': 'cancel',
        'click .delete-book': 'delete'
    },
    edit: function () {
        this.$('.edit-book').hide();
        this.$('.delete-book').hide();
        this.$('.update-book').show();
        this.$('.cancel').show();

        var title = this.$('.title').html();
        var author = this.$('.author').html();
        var year = this.$('.year').html();
        var genre = this.$('.genre').html();
        var id = this.$('.book-id').html();

        this.$('.title').html('<input type="text" class="form-control title-update" value="' + title + '">');
        this.$('.author').html('<input type="text" class="form-control author-update" value="' + author + '">');
        this.$('.year').html('<input type="text" class="form-control year-update" value="' + year + '">');
        this.$('.genre').html('<input type="text" class="form-control genre-update" value="' + genre + '">');

    },
    update: function(){
        this.model.set('title', $('.title-update').val());
        this.model.set('author', $('.author-update').val());
        this.model.set('year', $('.year-update').val());
        this.model.set('genre', $('.genre-update').val());
        this.model.save();
    },
    cancel: function () {
        booksView.render();
    },
    delete: function () {
        this.model.destroy();
    },
    render: function(){
        $(this.el).html(this.template(this.model.toJSON()));
        return this;
    }
});


// Backbone Views for all books

var BooksView = Backbone.View.extend({
    model: books,
    el: $(".books-list"),
    initialize: function() {
        this.model.on('sync', this.render, this);
        this.model.on('remove', this.render, this);
        this.model.on('invalid', function(error, message){
            alert(message);
        }, this);
        this.model.on('error', function (error, message) {
            alert(message.responseText);
        }, this);
    },
    render: function(){
        var self = this;
        $(this.el).html('');
        _.each(this.model.toArray(), function(book){
            $(self.el).append( (new BookView({model: book})).render().el );
        });
        return this;
    }
});

var booksView = new BooksView();


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
    books.fetch();

    $('.add-user').on('click', function(){

        var user = new User({
            firstname:  $('.firstname-input').val(),
            lastname:   $('.lastname-input').val(),
            email:      $('.email-input').val()
        });
        $('.firstname-input, .lastname-input, .email-input').val('');

        users.create(user);

    });

    $('.add-book').on('click', function(){

        var book = new Book({
            title:  $('.title-input').val(),
            author:   $('.author-input').val(),
            year:   $('.year-input').val(),
            genre:      $('.genre-input').val()
        });
        $('.title-input, .author-input, .year-input, .genre-input').val('');

        books.create(book);

    });

});