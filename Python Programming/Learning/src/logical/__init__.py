import datetime

class Person(object):    
    def __init__(self, name, job, pay): #Metodo especial de python __init__
        self.__name = name #Doble rayita abajo me permite establecer el atributo privado, sin ellas fuera publico
        self.__job = job
        self.__pay = pay

    def get_name(self):
        return self.__name


    def get_job(self):
        return self.__job


    def get_pay(self):
        return self.__pay


    def set_name(self, value):
        self.__name = value


    def set_job(self, value):
        self.__job = value


    def set_pay(self, value):
        self.__pay = value


    def del_name(self):
        del self.__name


    def del_job(self):
        del self.__job


    def del_pay(self):
        del self.__pay    

osvaldo = Person("Osvaldo", "Programador", 1000) #Instancia de un objeto Person

print(str(datetime.datetime.now()))
#armando = Person("Armando", "Telematico", 1000)

#-------------------------------Listas------------------#

#Las lista almacenan cualquier tipo de datos y son dinamicas

#my_list = [osvaldo, armando]
#my_list_two = [1,2]
#my_list.append(osvaldo) #Agregar un elemento al final de la lista
#my_list.extend(my_list_two) #Agrega los valores de la lista dos a my_list
#my_list.insert(index, object) #Agrega un elemento en un index especifico
#my_list.remove(0) #Elimina el elemento que esta en ese index 
#my_list.sort(key=None, reverse=False) #Ordena la lista