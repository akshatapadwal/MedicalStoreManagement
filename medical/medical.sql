create database mms;
\c mms;

create table staff
(
    sid serial primary key,
    sname varchar(50) not null,
    susername varchar(50) not null unique,
    spassword varchar(50) not null unique
);
    
create table customer
(
    cid serial primary key,
    cname varchar(50) not null,
    cage int not null,
    cgender varchar(50) not null,
    cphone numeric(10) not null,
    caddress varchar(50) not null,
    cusername varchar(50) not null unique
);
    
create table vendor
(
    vid serial primary key,
    vname varchar(50) not null,
    vage int not null,
    vgender varchar(50) not null,
    vphone numeric(10) not null,
    vaddress varchar(50) not null,
    vusername varchar(50) not null unique,
    sid int references staff(sid) on delete cascade on update set null
);

create table product
(
    pid serial primary key,
    pname varchar(50) not null,
    pprice numeric(5,2) not null,
    pmanufacturer varchar(50) not null,
    pdop date not null,
    pdoe date not null,
    vid int references vendor(vid) on delete cascade on update set null
);
    
create table bill
(
    bid serial primary key,
    bts timestamp default now(),
    bamt numeric(5,2),
    cid int references customer(cid) on delete cascade on update set null,
    sid int references staff(sid) on delete cascade on update set null
);

create table bp
(
    bid int references bill(bid) on delete cascade on update set null,
    pid int references product(pid) on delete cascade on update set null,
    quantity int
);